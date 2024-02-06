
//System Libraries
#include <iostream>  //I/O Library
using namespace std;

//User Libraries
#include<iomanip>
const int SIZE=12;

struct Player{
    int points=0;
    string name;
    int min , max;
};

//Function Prototypes
void setBoard(int []);
void dBrd(int [], Player, Player); //Eduardo
void turn(Player &, const Player &, int [], int&); //Joe
bool brdCheck(int, int, int[]);
char valChoice(char, int, int, int []);
void addRocks(Player &, int []);

//Execution Begins Here
int main(int argc, char** argv) {
    Player p1, p2;    
    int board[SIZE], c=0;
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
        turn(p1, p2, board, c);
        cont = brdCheck(p1.min, p1.max, board);
        if(!cont) {
            addRocks(p2, board);
        }
        
        //Player two turn
        if (cont) {
            turn(p2, p1, board, c);
            cont = brdCheck(p2.min, p2.max, board);
            if (!cont) {
                addRocks(p1, board);
            }
        }
        
    } while (cont);
    
    dBrd(board,p1,p2);
    
    //Determining winner
    cout<<"The game is over!\n";
    p1.points==p2.points? cout<<"It's a tie!":
    p1.points>p2.points? cout<<p1.name<<" wins!":cout<<p2.name<<" wins!";
    return 0;
}

void addRocks(Player &p, int board[SIZE]) {
    cout<<"Opponent has no more rocks, remaining rocks added to "<<p.name<<"'s side!\n";
    for (int i=p.min; i<=p.max; i++) {
        p.points+=board[i];
        board[i]=0;
    }
}

bool brdCheck(int min, int max, int board[SIZE]) {
    int sum=0;
    
    for(int i=min; i<=max; i++) {
        sum+=board[i];
    }
    
    if (sum==0) return false;
    else return true;
}

void setBoard(int board[SIZE]) {
    //Setting Board
    for(int i=0; i<SIZE; i++) {
        board[i] = 0;
    }
    
    
    board[0]=4;  board[1]=1;  board[2]=1; board[3]=0; board[4]=0; board[5]=1;
    board[11]=0; board[10]=1; board[9]=1; board[8]=4; board[7]=1; board[6]=1;
    
    
    
    
}

void turn(Player &p,const Player &p2, int board[SIZE],int &c) {
    R:
    bool continueG=false;    
    char choice; //user input
    int hand;    //rocks in hand
    int mvs=1; //number of moves
    int handcount=0;
    
    cout<<"It is now "<<p.name<<"'s turn!\n"; //********************
    cout<<"Please enter a choice: ";
    cin>>choice;
    choice=toupper(choice); //capitalize if not already capitalized
    
    choice=valChoice(choice, p.min, p.max, board); //validating the users choice
        
    cout<<"Choice is: "<<choice<<endl;
    choice-=65;  //Choice is now an integer that represents index of board
    hand=board[choice];
    handcount = hand;
    cout<<endl<<p.name<<" picked up "<<hand<<" rocks from index "<<char(choice+65)<<endl;
    
    do {
        cout<<"\nMove "<<mvs<<endl; //displays what move player is on
        hand=board[choice]; //pick up ricks at current index
        cout<<"Hand is "<<hand<<endl;   //displays rocks in hand
        
        //displays rocks from current index
        cout<<"Board at index "<<(char)(choice+65)<<" is "<<board[choice]<<endl; 
        
        board[choice]=0;    //sets index to 0 because rocks are in hand now
        for(int i=0; i<hand; i++) {
            choice+=1;        //advances to next hole to drop rock

            //point system
            if(choice == p.max+1){//add stones to the players points.
                p.points ++;
                 if (i == hand-1){
                     cout << "***You landed on your own point slot you get another turn***" << endl;
                    if (c % 2 == 0) {
                        dBrd(board, p, p2);
                        continueG = brdCheck(p.min,p.max,board);
                        if (continueG == false) {
                            break;
                        }
                    }
                    else {
                        dBrd(board, p2, p);
                        continueG = brdCheck(p.min,p.max,board);
                        if (continueG==false) {
                            break;
                        }
                    }
                    
                    goto R;
                 }
                
                hand--;
            }
            
            //if choice is at end reset back to beginning
            if (choice==12) choice=0; 
            board[choice]+=1; //Adding rock to next hole
            
            //Stealing rocks rule, if last hole is empty, rocks in opposing hole are yours
            if (board[choice]==1 && i==(hand-1) && board[SIZE - 1 - choice] != 0) {
                p.points += board[SIZE - 1 - choice] + 1; //adding opposing rocks to player points
                board[SIZE - 1 - choice] = 0;             //setting opponents hole to 0
                board[choice]--;                          //setting player hole to 0
                cout<<p.name<<" has stolen your rocks!"<<endl;
                
                //print board
                if(c%2 == 0){
                    dBrd(board, p, p2);
                } else {
                    dBrd(board, p2, p);
                }
                
            }
        }
        
        if(c%2 == 0){
            dBrd(board, p, p2);
        }
        else {
            dBrd(board, p2, p);
        }
        
        cout<<endl;
        mvs++;
        handcount--; 
    } while (board[choice]!=1);
    c++;
}

//Validates choice the user enters
//Loops until choice is within bounds
char valChoice(char choice, int min, int max, int board[SIZE]) { 
    
    while (choice < (char)(min+65) || choice > (char)(max+65) || (board[choice-65]==0)) {
        if (board[choice-65]==0) 
            cout<<"There are no rocks in that hole!\n";
        else if (choice < (char)(min+65) || choice > (char)(max+65)) 
        cout<<"That is out of bounds!\n";
        cout<<"Please enter a choice: ";
        cin>>choice; //no need for getline because no spaces
        choice=toupper(choice); //capitalize if not already capitalized
    }
    
    return choice;
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