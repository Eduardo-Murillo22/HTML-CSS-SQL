//System Libraries
#include <iostream>  //I/O Library
using namespace std;

//User Libraries
#include <iomanip>
#include <string>

const int SIZE=12;

struct Player{
    int points=0;
    string name;
    int min = 0;
    int max = 0;

};

//Function Prototypes
void setBoard(int []);
void dBrd(int [], Player, Player); //Eduardo
void turn(Player &,Player &, int []); //Joe

//Execution Begins Here
int main(int argc, char** argv) {
    Player p1, p2;    
    int board[SIZE];
    
    p1.name="Bob";
    p2.name="Dan";
    p1.min = 0;
    p1.max = 5;
    p2.min = 6;
    p2.max = 11;
    

    setBoard(board);
    dBrd(board,p1,p2);

    
    turn(p1, p2, board);
    turn(p2, p1, board);
    dBrd(board,p1,p2);

   
    return 0;
}

void setBoard(int board[SIZE]) {
    //Setting Board
    for(int i=0; i<SIZE; i++) {
        board[i] = 4;
    }
}

void turn(Player &p,Player &p2, int board[SIZE]) {
    char choice; //user input
    int hand;    //rocks in hand
    int mvs=1; //number of moves
    string game;
    
    cout<<"Please enter a choice: ";
    cin>>choice; //no need for getline because no spaces
    choice=toupper(choice); //capitalize if not already capitalized
    cout<<"Choice is: "<<choice<<endl;
    choice-=65;
    
    
    
    
    
    //min and max check
//        validation if the player can play his side of the board
    while(choice <= p2.max && choice >= p2.min){
        cout <<  "This is not the side of the board,\nyour side of the board is from index " << p.min <<  " to " << p.max << endl;
        cout << "Enter a new value between those index\n";
        cin>>choice; //no need for getline because no spaces
        choice=toupper(choice); //capitalize if not already capitalized 
        choice-=65;  //Choice is now an integer that represents index of board
             
    }
        
    //input validation for if there is not any stones in that position.
    while(board[choice] == 0){ 
        cout << "Sorry "<< p.name <<" but there is no stones in index "<< (int)choice << "\nplease choose a different position.\n";
        cin>>choice; //no need for getline because no spaces
        cout<<"Choice is: "<<choice<<endl;
        choice=toupper(choice); //capitalize if not already capitalized 
        choice-=65;  //Choice is now an integer that represents index of board
        while (choice <= p2.max && choice >= p2.min) {
            cout << "This is not the side of the board,\nyour side of the board is from index " << p.min << " to " << p.max << endl;
            cout << "Enter a new value between those index\n";
            cin>>choice; //no need for getline because no spaces
            choice = toupper(choice); //capitalize if not already capitalized 
            choice -= 65; //Choice is now an integer that represents index of board

        }
    }
    
    
    
    
    
    
    
    
  //Choice is now an integer that represents index of board
    hand=board[choice];
    cout<<endl<<p.name<<" picked up "<<hand<<" rocks from index "<<(int)choice<<endl;
    
    do {
        
        cout<<"\nMove "<<mvs<<endl; //displays what move player is on
        hand=board[choice]; //pick up ricks at current index
        cout<<"Hand is "<<hand<<endl;   //displays rocks in hand
        
        //displays rocks from current index
        cout<<"Board at index "<<(int)choice<<" is "<<board[choice]<<endl; 
        
        board[choice]=0;    //sets index to 0 because rocks are in hand now
        for(int i=0; i<hand; i++) {
            choice+=1;        //advances to next hole to drop rock
            
            
            
            //point system
            if(choice == p.max+1){//add stones to the players points.
                p.points ++;
                hand--;
            }
            
            
            
            
            
            
            if (choice==12) choice=0; //if choice is at end reset back to beginning
            board[choice]+=1; //Adding rock to next hole
           
        }
        
        dBrd(board,p,p2);
        cout<<endl;
        mvs++;
    } while (board[choice]!=1);
}

void dBrd(int B[SIZE], Player p1, Player p2){
    cout << "_________________________________________\n";
    cout << "|      |  A   B   C   D   E   F  |      |\n";
    cout << "|  p2  |_________________________|  p1  |\n";
    cout << "|      | "<<setw(2)<<B[0]<<"  "<<setw(2)<<B[1]<<"  "<<setw(2)<<B[2]<<"  "<<setw(2)<<B[3]<<"  "<<setw(2)<<B[4]<<"  "<<setw(2)<<B[5]<<"  |      |\n";
    cout << "| "<< setw(2) <<p2.points<<"   |-------------------------| "<< setw(2) <<p1.points<<"   |\n";
    cout << "|      | "<<setw(2) << B[11]<<"  "<<setw(2)<<B[10]<<"  "<<setw(2)<<B[9]<<"  "<<setw(2)<<B[8]<<"  "<<setw(2)<<B[7]<<"  "<<setw(2)<<B[6]<<"  |      |\n";
    cout << "|      |_________________________|      |\n";
    cout << "|      |  L   K   J   I   H   G  |      |\n";  
    cout << "_________________________________________\n";
}