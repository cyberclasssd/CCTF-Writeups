#include <stdlib.h>
#include <string.h>
#include <stdio.h>

void flag() {
  char buf[64];
  FILE *f = fopen("flag.txt","r");
  if (f == NULL) {
    printf("Flag file is missing! You might be running this locally. If this occurs on the remote server, please ping admins.\n");
    exit(0);
  }

  fgets(buf,64,f);
  printf(buf);
}

void vuln() {
	char owo[32];
	puts("Welcome to the owoifier!");
	printf("Please input a string to be owoified: ");
	gets(owo);
	printf("jk this owoifier sucks but here's what you input: %s\ni tried umu\n", owo);
}

int main() {
	setbuf(stdout, NULL);
	gid_t gid = getegid();
	setresgid(gid,gid,gid);
	vuln();
	return 0;	
}
