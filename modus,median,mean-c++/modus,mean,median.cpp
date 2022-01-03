#include <iostream>
using namespace std;

// mean, median, modus
int main (){

    int i, array[50], n, m, t;
    float j , r;

    cout << " pilih methode \n 1.mean\n 2.median\n 3.modus\n";
    cout << "pilihan : ";
    cin >> m;

    if ( m == 1 )
    {
        cout << "masukan banyaknya data : ";
        cin >> n;

        for ( i = 0; i < n; i++)
        {
            cout << "data ke- " << i + 1 << " = ";
            cin >> array[i];

            j += array[i];
        }

        r = j / n;

        cout << " jumlah = " << j << endl;
        cout << " mean = " << r;
        
    }else if( m == 2 )
    {
        cout << " masukan banyaknya data : ";
        cin >> n;

        for ( i = 0; i < n; i++)
        {
            cout << " data ke- " << i + 1 << " ";
            cin >> array[i];
        }

        i -= 1;
        t = i / 2;

        cout << "\n median = " << array[t];
        
    }
    
    

    return 0;
}