
//System Libraries
#include <iostream>  //I/O Library
using namespace std;

//User Libraries
const int SIZE=12;

struct Player{
    int points=0;
    string name;
    int min , max;
};

//Function Prototypes
void setBoard(int []);
void dBrd(int [], Player, Player); //Eduardo
void turn(Player, const Player, int []); //Joe
bool brdCheck(int, int, int[]);
char valChoice(char, int, int, int []);

//Execution Begins Here
int main(int argc, char** argv) {
    Player p1, p2;    
    int board[SIZE];
    bool cont=true;
    
    p1.name="Bob";
    p2.name="Dan";
    p1.min = 0;
    p1.max = 5;
    p2.min = 6;
    p2.max = 11;
    
    
    setBoard(board);
    dBrd(board,p1,p2);
    do {
        cont = false; //shall the game continue?
        //Player one turn
        turn(p1, p2, board);
        cont = brdCheck(p1.min, p1.max, board);
        
        //Player two turn
        if (cont) {
            turn(p2, p1, board);
            cont = brdCheck(p2.min, p2.max, board);
        }
        
    } while (cont);
//    dBrd(board,p1,p2);
    return 0;
}

bool brdCheck(int min, int max, int board[SIZE]) {
    int sum=0;
    
    for(int i=min; i<max; i++) {
        sum+=board[i];
    }
    
    if (sum==0) return false;
    else return true;
}

void setBoard(int board[SIZE]) {
    //Setting Board
    for(int i=0; i<SIZE; i++) {
        board[i] = 4;
    }
    
}

void turn(Player p,const Player p2, int board[SIZE]) {
    char choice; //user input
    int hand;    //rocks in hand
    int mvs=1; //number of moves
    
    cout<<"It is now "<<p.name<<"'s turn!\n"; //********************
    cout<<"Please enter a choice: ";
    cin>>choice;
    choice=toupper(choice); //capitalize if not already capitalized
    
    choice=valChoice(choice, p.min, p.max, board); //validating the users choice
    
    choice-=65;  //Choice is now an integer that represents index of board
    hand=board[choice];
    cout<<"Choice is: "<<choice<<endl;
    cout<<endl<<p.name<<" picked up "<<hand<<" rocks from index "<<board[choice]<<endl;
    
    do {
        cout<<"\nMove "<<mvs<<endl; //displays what move player is on
        hand=board[choice]; //pick up ricks at current index
        cout<<"Hand is "<<hand<<endl;   //displays rocks in hand
        
        //displays rocks from current index
        cout<<"Board at index "<<(char)(choice+65)<<" is "<<board[choice]<<endl; 
        
        board[choice]=0;    //sets index to 0 because rocks are in hand now
        for(int i=0; i<hand; i++) {
            choice+=1;        //advances to next hole to drop rock
            if (choice==12) choice=0; //if choice is at end reset back to beginning
            board[choice]+=1; //Adding rock to next hole
        }
        
        dBrd(board, p, p2);
        cout<<endl;
        mvs++;
    } while (board[choice]!=1);
}

//Validates choice the user enters
//Loops until choice is within bounds
char valChoice(char choice, int min, int max, int board[SIZE]) { 
    
    while (choice < (char)(min+65) || choice > (char)(max+65) || (board[choice-65]==0)) {
        if (board[choice-65]==0) //if no rocks in hole, choose again
            cout<<"There are no rocks in that hole!\n";
        
        else if (choice < (char)(min+65) || choice > (char)(max+65)) 
            cout<<"That is out of bounds!\n"; //choose again if out of bounds
        
        cout<<"Please enter a choice: ";
        cin>>choice; //no need for getline because no spaces
        choice=toupper(choice); //capitalize if not already capitalized
    }
    
    return choice;
}

void dBrd(int B[SIZE], Player p1, Player p2){
    cout << "_____________________________\n";
    cout << "|      | A B C D E F |      |\n";
    cout << "|  p2  |_____________|  p1  |\n";
    cout << "|      |-"<<B[0]<<"-"<<B[1]<<"-"<<B[2]<<"-"<<B[3]<<"-"<<B[4]<<"-"<<B[5]<<"-|      |\n";
    cout << "|  "<<p1.points<<"   |-------------|  "<<p2.points<<"   |\n";
    cout << "|      |-"<<B[11]<<"-"<<B[10]<<"-"<<B[9]<<"-"<<B[8]<<"-"<<B[7]<<"-"<<B[6]<<"-|      |\n";
    cout << "|      |_____________|      |\n";
    cout << "|      | L K J I H G |      |\n";  
    cout << "_____________________________\n";
}