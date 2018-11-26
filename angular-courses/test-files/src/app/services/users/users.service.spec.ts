// import { TestBed } from '@angular/core/testing';
//
// import { UsersService } from './users.service';
//
// describe('UsersService', () => {
//   beforeEach(() => TestBed.configureTestingModule({}));
//
//   it('should be created', () => {
//     const service: UsersService = TestBed.get(UsersService);
//     expect(service).toBeTruthy();
//   });
// });

//STEP 1 improve by reducing duplicity as per below

// import { TestBed } from '@angular/core/testing';
// import { UsersService } from './users.service';
//
// describe('UsersService', () => {
//   let usersService: UsersService; // Add this
//
//   beforeEach(() => {
//     TestBed.configureTestingModule({
//       providers: [UsersService]//add this
//     });
//
//     usersService = TestBed.get(UsersService); // Add this (injects service into test suite)
//   });
//
//   it('should be created', () => { // Remove inject()
//     expect(usersService).toBeTruthy();//change expect(service) to expect(userService)
//   });
// });

//STEP 2 add test for a all() method to return all users
import { TestBed } from '@angular/core/testing';
import { UsersService } from './users.service';

import { of } from 'rxjs'; // Add import


describe('UsersService', () => {
  let usersService: UsersService; // Add this

  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [UsersService]//add this
    });

    usersService = TestBed.get(UsersService); // Add this (injects service into test suite)
  });

  it('should be created', () => { // Remove inject()
    expect(usersService).toBeTruthy();//change expect(service) to expect(userService)
  });

  //NEW
  // Add tests for all() method
  describe('all', () => {
    it('should return a collection of users', () => {
      const userResponse = [
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
        }
      ];
      let response;
      spyOn(usersService, 'all').and.returnValue(of(userResponse));

      usersService.all().subscribe(res => {
        response = res;
      });
      console.log(response)
      expect(response).toEqual(userResponse);
    });
  });
  // Add tests for all() method
  describe('findOne', () => {
    it('should return a single user', () => {
      const userResponse = {
      id: '2',
      name: 'Bob',
      role: 'Developer',
      pokemon: 'Charizard'
    };
    let response;
    spyOn(usersService, 'findOne').and.returnValue(of(userResponse));

    usersService.findOne('2').subscribe(res => {
      response = res;
    });

    expect(response).toEqual(userResponse);
    });
  });


});
