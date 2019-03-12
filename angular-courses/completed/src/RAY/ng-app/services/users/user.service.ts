import { Injectable } from '@angular/core';
import {Observable, of} from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class UserService {

  users: Array<object> = [
    {
      id: '1',
      name: 'Ray'
    },
    {
      id: '2',
      name: 'Will'
    }
  ];

  constructor() { }

  all(): Observable<Array<object>> {
    console.log(this.users);
      return of(this.users);
      // http.get('backend api url')
        // .map(res=>res.json())
        // .subscribe(users=>{this.users=users;},err=>console.error(err));
        // return this.users
  }

  findOne(id: string): Observable<Array<object>> {

    const user = this.users.find((u: any) => user.id === id);
    return of(user);

  }


}
