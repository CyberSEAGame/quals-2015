#include <stdio.h>
#include <stdlib.h>
#include <string.h>

const unsigned char cipher[] = {
#include "flag.data"
};

int main(int argc, char *argv[])
{
	unsigned char flag[80];
	int i;

	fprintf(stdout, "Guess the flag: ");
	fflush(stdout);
	fgets(flag, sizeof(flag), stdin);

	for (i = 0; i < sizeof(cipher); i++) {
		if ((flag[i] ^ 0xff) != cipher[i]) {
			fprintf(stdout, "Nice try.\n");
			return -1;
		}
	}

	fprintf(stdout, "Congraturations!\n");

	return 0;
}
