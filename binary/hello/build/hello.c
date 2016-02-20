#include <stdio.h>

int main(int argc, char *argv[])
{
	if (argc <= 1) {
		printf("Hello, world!\n");
	} else if (strcmp(argv[1], "world") != 0) {
		printf("Hi!\nBut, do I know you?\n");
	} else {
		printf("Hi!\nThe flag is flag{H3110, w0r1d!}\n");
	}
}
