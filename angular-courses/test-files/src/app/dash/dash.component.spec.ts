import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { DebugElement } from '@angular/core';
import { By } from '@angular/platform-browser';
import { DashComponent } from './dash.component';

describe('DashComponent', () => {
  let component: DashComponent;
  let fixture: ComponentFixture<DashComponent>;
  let de: DebugElement;
  console.log(de);
  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DashComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DashComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it(`should have as title 'dash'`, async(() => {
      fixture = TestBed.createComponent(DashComponent);
      component = fixture.debugElement.componentInstance;
      expect(component.title).toEqual('dash');
  }));

  it('should have a p tag of `dash works!`', () => {
    fixture = TestBed.createComponent(DashComponent);
    component = fixture.componentInstance;
    //call detect changes here
    //fixture.detectChanges();
    de = fixture.debugElement.query(By.css('p'));
    console.log(de);
    expect(de.nativeElement.innerText).toBe('dash works!');
  });

});
