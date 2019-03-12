import { Component, OnInit, Input } from '@angular/core';
import {UserService} from '../services/users/user.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  users: Array<Object>;

  constructor(userService: UserService) {
    userService.all()
      .subscribe(res => this.users = res, err => console.error(err));
  }

  ngOnInit() {
  }

}
