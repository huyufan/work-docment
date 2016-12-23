/*
 * =====================================================================================
 *
 *       Filename:  macro.c
 *
 *    Description:  macro
 *
 *        Version:  1.0
 *        Created:  2016年08月23日 15时16分59秒
 *       Revision:  none
 *       Compiler:  gcc
 *
 *         Author:  huyufan (cc), flat_boy@163.com
 *        Company:  xiaohu
 *
 * =====================================================================================
 */

#include<stdio.h>

int main(int argc,char* argv){
int answer;
short x=1;
long y=2;
float u=3.0;
double v =4.4;
long double w=5.54;
char c ='p';
char *s='asdasd';
printf("%d\n",__LINE__);
printf("%s\n",__DATE__);
printf("%s\n",__TIME__);
printf("%s\n",__FILE__);
printf("Enter 1 or 0 :");
scanf("%d",&answer);

printf("%s\n",answer?"You sayd Yes":"you sayd No");
 printf("The size of int %d\n", sizeof(answer));
    printf("The size of short %d\n", sizeof(x));
    printf("The size of long %d\n", sizeof(y));
    printf("The size of float %d\n", sizeof(u));
    printf("The size of double %d\n", sizeof(v));
    printf("The size of long double %d\n", sizeof(w));
    printf("The size of char %d\n", sizeof(c));
  printf("string%s\n",s);
return 0;
}
