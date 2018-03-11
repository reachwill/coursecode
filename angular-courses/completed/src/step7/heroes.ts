
import {Component, ContentChildren, QueryList} from "@angular/core";
import {Hero} from "./hero";//only if extend unit


const HEROES = [
    {id: 1, name:'Superman',marvel:true,hulk:false},
    {id: 2, name:'Batman',marvel:false,hulk:false},
    {id: 5, name:'BatGirl',marvel:false,hulk:false},
    {id: 3, name:'Robin',marvel:true,hulk:false},
    {id: 4, name:'Flash',marvel:false,hulk:false},
    {id: 5, name:'Hulk',marvel:true,hulk:true}
];

@Component({
    selector:'heroes',
    template: `
    <table>
        <thead>
            <th>Name</th>
            <th>Index</th>
        </thead>
        <tbody>
            <!--<tr *ngFor="let hero of heroes; let i = index" [class.marvel]="hero.marvel">
            -->
<tr *ngFor="let hero of heroes; let i = index" [ngClass]="{marvel:hero.marvel,hulk:hero.hulk}">

                <td>{{hero.name}}</td>
                <td>{{i}}</td>

            </tr>
        </tbody>
    </table>
`
})
export class Heroes {

  heroes = HEROES;

     //@ContentChildren(Hero)
     //heroes: QueryList<Hero>;

}
