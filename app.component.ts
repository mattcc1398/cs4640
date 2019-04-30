import { Component } from '@angular/core';
import { Order } from './order';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Subscription';


  // let's create a property to store a response from the back end
  // and try binding it back to the view
  responsedata = 'response data';

  times = ['Daily', 'Monthly', 'Yearly'];
  orderModel = new Order('email', '');
 
  constructor(private http: HttpClient) { }

  senddata(data) {
     console.log(data);

     let params = JSON.stringify(data);
     this.http.get('http://localhost:8080/mcc8ny-djt5pf-assign4/ngphp-get.php?str='+params)
     .subscribe((data) => {
        console.log('Got data from backend', data);
        this.responsedata = data;
     }, (error) => {
        console.log('Error', error);
     })
  }
}