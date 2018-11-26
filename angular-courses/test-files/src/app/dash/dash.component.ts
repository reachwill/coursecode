import { Component, OnInit } from '@angular/core';
import { UsersService } from '../services/users/users.service';

@Component({
  selector: 'app-dash',
  templateUrl: './dash.component.html',
  styleUrls: ['./dash.component.css']
})
export class DashComponent implements OnInit {

  title = 'dash';
  users;//added when integrating userservice
  constructor(private usersService: UsersService) { }

  ngOnInit() {
   this.usersService.all().subscribe(res => {
     this.users = res;
   });
  }

}
