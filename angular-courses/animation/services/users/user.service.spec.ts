import { TestBed } from '@angular/core/testing';

import { UserService } from './user.service';
import {of} from 'rxjs';

describe('UserService', () => {
  let userService: UserService;

  beforeEach(() => TestBed.configureTestingModule({
    providers:[UserService]
  }));

  beforeEach(()=>userService = TestBed.get(UserService));



  it('should be created', () => {
    const service: UserService = TestBed.get(UserService);
    expect(service).toBeTruthy();
  });

  describe('all',()=>{
    it('should return all users',()=>{
      //create some mock data
      const userResponse = [
        {
          id:'1',
          name: 'Jane',
          role: 'Developer'
        },
        {
          id:'2',
          name: 'John',
          role: 'Designer'
        }
      ];

      spyOn(userService,'all').and.returnValue(of(userResponse));
      userService.all().subscribe(res=>{expect(res).toEqual(userResponse)});
      ;
    });
  });

  describe('findOne',()=>{
    it('should return a single user',()=>{
      const userResponse = {
        id: '1',
        name: 'Jane',
        role: 'Developer'
      };
      spyOn(userService,'findOne').and.returnValue(of(userResponse));
      userService.findOne('2').subscribe(res=>expect(res).toEqual(userResponse));
    })
  });



});
