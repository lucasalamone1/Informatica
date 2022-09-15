#include <stdio.h>
#include <string.h>

#define R 5
#define C 20

void carica(char [][C]);
void stampa(char [][C]);
void ordina(char [][C]);

int main()
{
	char mat[R][C];
	
	carica(mat);
	printf("\n");
	stampa(mat);
	printf("\nordinamento\n\n");
	ordina(mat);
	stampa(mat);
	
	
}

void ordina(char mat[][C])
{
	int i,j;
	char app[C];
	
	for(i=0;i<R-1;i++)
	for(j=i+1;j<R;j++)
	{
		if(strcmp(mat[i],mat[j])>0)
		{
			strcpy(app,mat[j]);
			strcpy(mat[j],mat[i]);
			strcpy(mat[i],app);
		}
	}
}

void carica(char mat[][C])
{
	int i;
	
	for(i=0;i<R;i++)
	scanf("%s", mat[i]);
}

void stampa(char mat[][C])
{
	int i;
	
	for(i=0;i<R;i++)
	{
		printf("%s\n", mat[i]);
	}
}
