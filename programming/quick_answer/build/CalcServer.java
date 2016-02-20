/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package calcserver;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author koide
 */
public class CalcServer {

    static List<Client> clients = new ArrayList();
    
    void server() {
        try {
            ServerSocket s = new ServerSocket(7777);
            for (;;) {
                Socket c = s.accept();
                Client client = new Client(c);
                clients.add(client);
                client.start();
            }
        } catch (IOException ex) {
        }
        
    }
    
    public static void main(String[] args) {
        CalcServer c = new CalcServer();
        c.server();
    }
    
    private class Problem extends Thread {
        
        Client c;
        int a, b, limit;
        Random rand = new Random();
        
        public Problem(Client c, int limit) {
            this.c = c;
            a = Math.abs(rand.nextInt() % 10000);
            b = Math.abs(rand.nextInt() % 10000);
            this.limit = limit;
            this.start();
        }
     
        int calc() { return a * b; }
        
        public void run() {
            try {
                for (int i=0; i < limit; i++) {
                    Thread.sleep(limit*1000);
                }
                try {
                    c.buf.close();
                } catch (IOException ex) {
                }
            } catch (InterruptedException ex) {
            }
        }
        
        String problem() {
            return a+" * "+b+"\n";
        }
        
        boolean answer(String line) {
            int ans;
            try {
                ans = Integer.parseInt(line);
            } catch (NumberFormatException e) {
                return false;
            }
            if (ans == calc()) {
                return true;
            } else { 
                return false;
            }
        }
    }
    
    private class Client extends Thread {
        public BufferedReader buf;
        public PrintWriter prt;
        private boolean finishFlag = false;
        
        public Client(Socket c) {
            try {
                buf = new BufferedReader(new InputStreamReader(c.getInputStream()));
                prt = new PrintWriter(c.getOutputStream());
            } catch (IOException ex) {
            }
        }
        
        public void run() {
            
            for (int limit = 512; finishFlag==false && limit >= 1; limit /= 2) {
                Problem problem = new Problem(this, limit);
                
                prt.write(problem.problem());
                prt.flush();
                
                try {
                    String line = buf.readLine();
                    if (line==null) {
                        clients.remove(this);
                        return;
                    }

                    if (problem.answer(line)==false) {
                        prt.write("You lose.\n");
                        prt.flush();
                        prt.close();
                        buf.close();
                        return;
                    };
                    
                } catch (IOException ex) {
                }
            }
            
            if (finishFlag==false) {
                prt.write("flag{hello,world!}\n");
                prt.flush();
                prt.close();
                try {
                    buf.close();
                } catch (IOException ex) {
                }
            }
        }

        private void finish() {
            finishFlag = true;
        }
    }
    
}
