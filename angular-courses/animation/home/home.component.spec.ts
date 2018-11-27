import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import {DebugElement} from '@angular/core';
import {By} from '@angular/platform-browser';


import { HomeComponent } from './home.component';

describe('HomeComponent', () => {
  let component: HomeComponent;
  let fixture: ComponentFixture<HomeComponent>;
  let de: DebugElement;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HomeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('should have a title property with value Home',()=>{
    expect(component.title).toEqual('Home');
  });

  it('should have  a p tag with the text home works',()=>{
    de = fixture.debugElement.query(By.css('p'));
    expect(de.nativeElement.innerText).toBe('home works');
  });





});
