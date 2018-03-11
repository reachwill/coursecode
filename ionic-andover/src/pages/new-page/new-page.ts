import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { DatePicker } from '@ionic-native/date-picker';

/*
  Generated class for the NewPage page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/

// ionic plugin add cordova-plugin-datepicker
// npm install --save @ionic-native/date-picker


@Component({
  selector: 'page-new-page',
  templateUrl: 'new-page.html',
  providers:[DatePicker]
})
export class NewPagePage {
  title:string = 'My Great Title';
  selectedDate:Date;
  constructor(public navCtrl: NavController, public navParams: NavParams, private datePicker: DatePicker) { }

  ionViewDidLoad() {
    console.log('ionViewDidLoad NewPagePage');
  }

  pickDate() {
    this.datePicker.show({
      date: new Date(),
      mode: 'date',
      androidTheme: this.datePicker.ANDROID_THEMES.THEME_HOLO_DARK
    }).then(
      date => this.selectedDate = date,
      err => console.log('Error occurred while getting date: ', err)
      );
  }

}
