#include <stdio.h>
#include <stdlib.h>

int global_var = 0xbaaaaaad;
int global_var2 = 0x12345678;
int global_var3 = 0xeeeeeeee;

void win (int arg2) {
	puts("you're in the win function!");
	char buf[64];
	FILE *f = fopen("flag.txt","r");
	if (f == NULL) {
		printf("Flag file is missing! You might be running this locally. If this occurs on the remote server, please ping admins.\n");
		exit(0);
	}

  	fgets(buf,64,f);
	
	if (global_var == 0xfee15bad && global_var2 == 0xbeefd00d && !!global_var3 && arg2 == 0xc0cac01a) {	
		printf(buf);
	}
	
}

void vuln2 (int arg) {
	puts("kinda? keep going.");
  	
	int var2 = 0xc0715bad;
	
	global_var2 = arg;
	global_var3 = var2;
	
}

void vuln1 () {
	int var = 0xdeadbeef;
	
	puts("boing boing boing am bluefrogsay give me something to say: ");
	char buf[100];
	read(0, buf, 0x100);

	global_var = var;
	
	printf("here is what i say: %s", buf);
}

int main () {
	setbuf(stdout, NULL);
	gid_t gid = getegid();
	setresgid(gid,gid,gid);

	vuln1();

	return 0;
}

