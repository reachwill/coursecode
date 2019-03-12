import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.css']
})
export class ContactComponent implements OnInit {

  rForm: FormGroup;
  errorMessage = 'This field is required';

  constructor(private fb: FormBuilder) {
      this.rForm = fb.group({
        'name': [null, Validators.required],
        'description': [null, Validators.compose([Validators.required, Validators.minLength(30), Validators.maxLength(50)])],
        'validate': ''
      });
  }

  ngOnInit() {

        this.rForm.get('validate').valueChanges.subscribe(
          (validate) => {

            if (validate === '1') {

              this.rForm.get('name').setValidators([Validators.required, Validators.minLength(3)]);
              this.errorMessage = 'Only 3 chars';
            } else {

              this.rForm.get('name').setValidators(Validators.required);
            }
            this.rForm.get('name').updateValueAndValidity();
          }
        );


  }

}
