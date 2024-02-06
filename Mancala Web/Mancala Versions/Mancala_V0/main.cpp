
//System Libraries
#include <iostream>  //I/O Library
using namespace std;

//User Libraries
const int SIZE=12;

//Function Prototypes
void setBoard(int []);
void dBrd(); //eduardo
void turn(); //joe

//Execution Begins Here
int main(int argc, char** argv) {
    
    string p1, p2;
    char choice;
    int board[SIZE];
    setBoard(board);
    
    
    
    return 0;
}

void setBoard(int board[SIZE]) {
    //Setting Board
    for(int i=0; i<SIZE; i++) {
        board[i] = 4;
    }
}