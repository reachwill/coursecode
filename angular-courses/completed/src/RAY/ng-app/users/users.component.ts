import { Component, OnInit } from '@angular/core';
import {UserService} from '../services/users/user.service';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.css']
})
export class UsersComponent implements OnInit {

  users: Array<Object>;

  constructor(userService: UserService) {
    userService.all()
      .subscribe(res => this.users = res, err => console.error(err));
  }

  ngOnInit() {
  }

}
