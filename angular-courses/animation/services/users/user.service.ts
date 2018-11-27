import { Injectable } from '@angular/core';
import {Observable,of} from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class UserService {
  users: Array<object> = [
    {
      id:'1',
      name:'Linda',
      role: 'Developer'
    },
    {
      id:'2',
      name:'James',
      role: 'Developer'
    },
    {
      id:'3',
      name:'Mary',
      role: 'Designer'
    }
  ];

  constructor() { }

  all():Observable<Array<object>>{
    return of(this.users);
  }

  findOne(id:string):Observable<object>{
    const user = this.users.find((u:any)=>{
      return u.id === id;
    });
    return of(user);
  }





}
