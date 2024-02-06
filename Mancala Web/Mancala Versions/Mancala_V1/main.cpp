
//System Libraries
#include <iostream>  //I/O Library
using namespace std;

//User Libraries
const int SIZE=12;

struct Player{
    int points=0;
    string name;
};

//Function Prototypes
void setBoard(int []);
void dBrd(int [], Player, Player); //Eduardo
void turn(Player, Player, int []); //Joe

//Execution Begins Here
int main(int argc, char** argv) {
    Player p1, p2;    
    int board[SIZE];
    
    p1.name="Bob";
    p2.name="Dan";
    setBoard(board);
    dBrd(board,p1,p2);
    
    turn(p1, p2, board);
    turn(p2, p2, board);
    
//    dBrd(board,p1,p2);
    return 0;
}

void setBoard(int board[SIZE]) {
    //Setting Board
    for(int i=0; i<SIZE; i++) {
        board[i] = 4;
    }
}

void turn(Player p1, Player p2, int board[SIZE]) {
    char choice; //user input
    int hand;    //rocks in hand
    int mvs=1; //number of moves
    
    cout<<"Please enter a choice: ";
    cin>>choice; //no need for getline because no spaces
    choice=toupper(choice); //capitalize if not already capitalized
    
    cout<<"Choice is: "<<choice<<endl;
    choice-=65;  //Choice is now an integer that represents index of board
    hand=board[choice];
    cout<<endl<<p1.name<<" picked up "<<hand<<" rocks from index "<<board[choice]<<endl;
    
    do {
        cout<<"\nMove "<<mvs<<endl; //displays what move player is on
        hand=board[choice]; //pick up ricks at current index
        cout<<"Hand is "<<hand<<endl;   //displays rocks in hand
        
        //displays rocks from current index
        cout<<"Board at index "<<(int)choice<<" is "<<board[choice]<<endl; 
        
        board[choice]=0;    //sets index to 0 because rocks are in hand now
        for(int i=0; i<hand; i++) {
            choice+=1;        //advances to next hole to drop rock
            if (choice==12) choice=0; //if choice is at end reset back to beginning
            board[choice]+=1; //Adding rock to next hole
        }
        
        dBrd(board, p1, p2);
        cout<<endl;
        mvs++;
    } while (board[choice]!=1);
    
    
}

void dBrd(int B[SIZE], Player p1, Player p2){
    cout << "_____________________\n";
    cout << "|   | A B C D E |   |\n";
    cout << "|   |___________|   |\n";
    cout << "|   |-"<<B[0]<<"-"<<B[1]<<"-"<<B[2]<<"-"<<B[3]<<"-"<<B[4]<<"-|   |\n";
    cout << "| "<<p1.points<<" |-----------| "<<p1.points<<" |\n";
    cout << "|   |-"<<B[5]<<"-"<<B[6]<<"-"<<B[7]<<"-"<<B[8]<<"-"<<B[9]<<"-|   |\n";
    cout << "|   |___________|   |\n";
    cout << "|   | F G H I J |   |\n";  
    cout << "_____________________\n";
}