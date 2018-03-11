import { Component, ViewChild } from '@angular/core';
import {FormGroup,FormBuilder,Validators} from '@angular/forms';
import { NavController } from 'ionic-angular';
import {Storage} from '@ionic/storage';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html',
  providers:[Storage]
})
export class HomePage {

  @ViewChild('formSlides') formSlides: any;

  //declare the individual forms as properties(members) within the Component
  slide1Form: FormGroup;
  slide2Form: FormGroup;

  //declare storage property to handle persistent data
  storage:Storage;

  //declare form value properties
  intensityOfActivity:string;
  durationOfActivity:string;

  constructor(public navCtrl: NavController, public formBuilder:FormBuilder, storage:Storage) {
    //actually instantiate the storage property
    this.storage = storage;

    //this.intensityOfActivity='Very High';

    //create an instance of the slide1Form group
    this.slide1Form = formBuilder.group({
      intensityOfActivity:['',Validators.required]
    });
    //create an instance of the slide2Form group
    this.slide2Form = formBuilder.group({
      durationOfActivity:['',Validators.required]
    });

    //go get the stored data
    this.getStorage('slide1Form');
    this.getStorage('slide2Form');


  }

  changed(e){
    //console.log(e);

    //get reference to the current slide
    var slideIndex = this.formSlides.getActiveIndex();
    //use slide index to get reference to current form
    var form = this['slide'+slideIndex+'Form'];//this is the equivilent of this.slide1Form for eg

    if(form!=undefined){
      this.setStorage(form,'slide'+slideIndex+'Form');
    }
    //console.log(form.value);
    //this.setStorage(form,'slide'+slideIndex+'Form');
  }

  send(){

    if(this.slide1Form.valid==false){
      this.formSlides.slideTo(1);
    }
    else if(this.slide2Form.valid==false){
      this.formSlides.slideTo(2);
    }


  }

  setStorage(form,key){
    //console.log(form);
    this.storage.set(key,form.value).then(
      ()=>{
        //for testing
        //this.getStorage(key);
      }
    )

  }

  getStorage(key){

    this.storage.get(key).then(
      (formData)=>{
        // console.log(formData)
        for(var property in formData){
          this[property]=formData[property];
        }

      }
    )
  }

  clearStorage(){
      this.storage.clear();
  }


  next() {
    if (this.formSlides.isEnd()) {
      this.formSlides.slideTo(0);
    } else {
      this.formSlides.slideNext();
    }
  }



  prev() {
    this.formSlides.slidePrev();
  }

}
