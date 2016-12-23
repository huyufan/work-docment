/*
 * =====================================================================================
 *
 *       Filename:  app3.c
 *
 *    Description:  
 *
 *        Version:  1.0
 *        Created:  2016年06月20日 15时35分25秒
 *       Revision:  none
 *       Compiler:  gcc
 *
 *         Author:  Dr. Fritz Mehner (mn), mehner@fh-swf.de
 *        Company:  FH Südwestfalen, Iserlohn
 *
 * =====================================================================================
 */


#include<stdio.h>
#include<math.h>
int main(int argc, char *argv[])
{
int i;
int k;
int j;
for(i=1;i<1000000;i++){
k=sqrt(i+100);
j=sqrt(i+268);
if(k*k==i+100 && j*j==i+268){
 printf("i=%d",i);
break;
}
}
int a=sqrt(16);
printf("%d",a);
	return 0 ;

}
