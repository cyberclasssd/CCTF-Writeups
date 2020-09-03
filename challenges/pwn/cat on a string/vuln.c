#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define LINE_BUFFER_SIZE 2000


void playinstrument(char *instrument)
{
    printf(strcat(instrument, " says TOOOOOOOOOT!\n"));
}

int main (int argc, char **argv)
{
    setbuf(stdout, NULL);    
    puts("You have been tasked with inventing a new string instrument! Input a string and we'll play it back to you.");
    int read;
    unsigned int len;
    char *input = NULL;
    char * buf = malloc(sizeof(char)*128);
    FILE *f = fopen("flag.txt","r");
    fgets(buf,128,f);
    ssize_t chars = getline(&input, &len, stdin);
    if ((input)[chars - 1] == '\n') 
    {
        (input)[chars - 1] = '\0';
        --chars;
    }
    playinstrument(input);
    fflush(stdout);
}
