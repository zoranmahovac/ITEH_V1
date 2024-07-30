import { Injectable } from '@angular/core';
import { Aranzman } from '../../models/aranzman';


@Injectable({
  providedIn: 'root'
})
export class ShareService {
  aranzmani:Aranzman[]=[];
  constructor() { }

  setAranzman(data:Aranzman){
    this.aranzmani.push(data);
  }

  getAranzman(){
    return this.aranzmani;
  }

}
