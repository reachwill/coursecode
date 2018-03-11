import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';
import { ContactComponent } from './contact/contact.component';
import { HomeComponent } from './home/home.component';


import { AppRoutingModule } from './app-routing/app-routing.module';//step16 add this
import { ReactiveFormsModule } from '@angular/forms';//step18 add this

@NgModule({
  declarations: [
    AppComponent,
    ContactComponent,
    HomeComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    AppRoutingModule,//step 16 add this
    ReactiveFormsModule//step 18 add this
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
