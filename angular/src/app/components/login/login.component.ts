import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, FormBuilder, Validators } from '@angular/forms';

import { AuthService } from '../../services/auth.service';
import { User } from '../../models/user';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  user = new User('', '', '', '', '', '', '', '', '', '');

  loginForm: FormGroup;

  emailControl: FormControl;
  passwordControl: FormControl;

  constructor(
    private authService: AuthService,
    private fb: FormBuilder
  ) {
    this.emailControl = fb.control('', [Validators.required]);
    this.passwordControl = fb.control('', [Validators.required]);

    this.loginForm = fb.group({
      email : this.emailControl,
      password : this.passwordControl,
    });
  }

  ngOnInit() {
  }

  login() {
    this.authService.login(this.user);
  }

}
