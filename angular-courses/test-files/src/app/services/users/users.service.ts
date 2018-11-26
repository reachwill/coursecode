import { Injectable } from '@angular/core';
//Step 3
import { Observable, of } from 'rxjs'; // Add imports -- you can use of() to return a fake response

@Injectable({
  providedIn: 'root'
})
export class UsersService {
  users: Array<object> = [  // Add employee object
    {
      id: '1',
      name: 'Jane',
      role: 'Designer',
      pokemon: 'Blastoise'
    },
    {
      id: '2',
      name: 'Bob',
      role: 'Developer',
      pokemon: 'Charizard'
    },
    {
      id: '3',
      name: 'Jim',
      role: 'Developer',
      pokemon: 'Venusaur'
    },
    {
      id: '4',
      name: 'Adam',
      role: 'Designer',
      pokemon: 'Yoshi'
    }
  ];

  constructor() { }

  all(): Observable<Array<object>> {
    return of(this.users);//you can use of() to return a fake response for testing
  }

  findOne(id: string): Observable<object> {
    const user = this.users.find((u: any) => {
      return u.id === id;
    });
    return of(user);
  }
}
