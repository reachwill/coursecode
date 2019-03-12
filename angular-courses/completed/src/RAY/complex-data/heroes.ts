import {Component, ContentChildren, QueryList} from '@angular/core';
import {Hero} from "./hero";//only if extend unit

const HEROES = [
  {
    id:1,
    name:'Superman',
    inStock: true,
    marvel:false
  },
  {
    id:2,
    name:'Batman',
    inStock: false,
    marvel:false
  },
  {
    id:3,
    name:'Spiderman',
    inStock: false,
    marvel:false
  },
  {
    id:4,
    name:'Hulk',
    inStock: true,
    marvel:true
  }
];


@Component({
  selector:'heroes',
  template:`
        
        <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>ID</th>
              </tr>
            </thead>
            <tbody>
              <tr *ngFor="let hero of heroes" [ngClass]="{instock:hero.inStock,marvel:hero.marvel}">
                  <td>{{hero.name}}</td>
                  <td>{{hero.id}}</td>
              </tr>
            </tbody>
        </table>

  `
})

export class Heroes{
  //heroes = HEROES;
  @ContentChildren(Hero)
  heroes: QueryList<Hero>;
  
  
}
