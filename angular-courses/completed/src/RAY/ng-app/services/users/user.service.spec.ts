import { TestBed } from '@angular/core/testing';

import { UserService } from './user.service';

import {Observable, of} from 'rxjs';

describe('UserService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: UserService = TestBed.get(UserService);
    expect(service).toBeTruthy();
  });

  it('all method should be defined', () => {
    const service: UserService = TestBed.get(UserService);
    expect(service.all).toBeDefined();
  });

      describe('all', () => {
        it('should return a collection of users', () => {
          const userResponse = [
            {
              id: '1',
              name: 'Ray'
            },
            {
              id: '2',
              name: 'Will'
            }
          ];
          let response;
          const service: UserService = TestBed.get(UserService);
          spyOn(service, 'all').and.returnValue(of(userResponse));

          service.all().subscribe(res => {response = res; });

          expect(response).toEqual(userResponse);

        });
      });


      describe('findOne', () => {
        it('should find a single user', () => {
          const userResponse = {
              id: '1',
              name: 'Ray'
            };
            let response;
            const service: UserService = TestBed.get(UserService);
            spyOn(service, 'findOne').and.returnValue(of(userResponse));
            service.findOne('1').subscribe(res => response = res);
            expect(response).toEqual(userResponse);
        });
      });
});
