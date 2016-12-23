/*
 * =====================================================================================
 *
 *       Filename:  app6.c
 *
 *    Description:  sidfj
 *
 *        Version:  1.0
 *        Created:  2016年06月20日 17时19分34秒
 *       Revision:  none
 *       Compiler:  gcc
 *
 *         Author:  huyufan (cc), flat_boy@163.com
 *        Company:  xiaohu
 *
 * =====================================================================================
 */

#include<stdio.h>
#include<stdlib.h>

int main(int argc,char *argv[]){
int N;
int *a;
int i;
printf("input array length:");
scanf("%d",&N);
a =(int *)calloc(N,sizeof(int));
for(i=0;i<N;i++){
a[i]=i+1;
printf("%5d",a[i]);
if((i+1)%10==0){
printf("\n");
}
}
free(a);
a=NULL;
return 0;
}

