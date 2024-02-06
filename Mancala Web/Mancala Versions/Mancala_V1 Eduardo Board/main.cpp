
//System Libraries
#include <iostream>  //I/O Library
using namespace std;

//User Libraries
const int SIZE=12;

struct player{
    int points=0;
    string name;
};
//Function Prototypes
void setBoard(int []);
void dBrd(int [],player,player); //Eduardo
void turn(); //Joe

enum Pchoice{
    A,B,C,D,E,F,G,H,I,J
};

//Execution Begins Here
int main(int argc, char** argv) {
    bool test=true;
    Pchoice X;
    player p1, p2;
    char choice;
    int board[SIZE];
    setBoard(board);
    dBrd(board,p1,p2);
    while(test = true){
        cin >> choice;
        choice=toupper(choice);

        if(choice == 'A'){
          X = A;  
        }else if(choice == 'B'){
            X = B;
        }else if(choice == 'B'){
            X = B;
        }else if(choice == 'C'){
            X = C;
        }else if(choice == 'D'){
            X = D;
        }else if(choice == 'E'){
            X = E;
        }else if(choice == 'F'){
            X = F;
        }else if(choice == 'G'){
            X = G;
        }else if(choice == 'H'){
            X = H;
        }else if(choice == 'I'){
            X = I;
        }else if(choice == 'J'){
            X = J;
        }
        int move=0;
        cout << X << endl;
        int rep = board[X];
        for(int i=0;i < rep;i++){ 

            if (board[X] == 4){
                p2.points += 1;
                move--;
                rep--;
            }
            move = board[X];
            board[X] = 0;
            board[X+i+1] +=1 ;
            move--;

        }
        dBrd(board,p1,p2);
    }
    return 0;
}

void setBoard(int board[SIZE]) {
    //Setting Board
    for(int i=0; i<SIZE; i++) {
        board[i] = 4;
    }
}

void dBrd(int B[SIZE],player p1,player p2){
    cout << "_____________________\n";
    cout << "|   | A B C D E |   |\n";
    cout << "|   |___________|   |\n";
    cout << "|   |-"<<B[0]<<"-"<<B[1]<<"-"<<B[2]<<"-"<<B[3]<<"-"<<B[4]<<"-|   |\n";
    cout << "| "<<p1.points<<" |-----------| "<<p2.points<<" |\n";
    cout << "|   |-"<<B[5]<<"-"<<B[6]<<"-"<<B[7]<<"-"<<B[8]<<"-"<<B[9]<<"-|   |\n";
    cout << "|   |___________|   |\n";
    cout << "|   | F G H I J |   |\n";  
    cout << "_____________________\n";
}