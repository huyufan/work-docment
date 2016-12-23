/*
 * =====================================================================================
 *
 *       Filename:  app9.c
 *
 *    Description:  filename
 *
 *        Version:  1.0
 *        Created:  2016年06月21日 17时26分21秒
 *       Revision:  none
 *       Compiler:  gcc
 *
 *         Author:  huyufan (cc), flat_boy@163.com
 *        Company:  xiaohu
 *
 * =====================================================================================
 */

#include<stdio.h>
#include<string.h>
//int *getCharNum(char *filename,int *totalNum);

int *getCharNum(char *filename,int *totalNum){
FILE *fp;
char buffer[1003];
int bufferlen;
int i;
char c;
int isLastBlank=0;
int charNum=0;
int wordNum=0;
if((fp=fopen(filename,"rb"))==NULL){
perror(filename);
return NULL;
 }
printf("line words chars%s\n",fp);
char ch=getchar();
printf("%s",ch);
return 0;
while(fgets(buffer,1003,fp) != NULL){
bufferlen=strlen(buffer);
printf("%s",bufferlen);
}
return 0;
}
int main(){
char filename[30];
int totalNum[3]={0,0,0};
printf("Input file name:");
scanf("%s",filename);
if(getCharNum(filename,totalNum)){
printf("adsdsad");
}
return 0;
 }
