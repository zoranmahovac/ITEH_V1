import { Component, OnInit,Input,ViewChild } from '@angular/core';
import { AranzmanService } from '../services/aranzman.service';
import { Aranzman } from '../models/aranzman';
import { Router } from '@angular/router';
import { ShareService } from '../services/shared/share.service';
import { MatPaginator } from '@angular/material/paginator';
import { Brosura } from '../models/brosura';


@Component({
  selector: 'app-aranzman',
  templateUrl: './aranzman.component.html',
  styleUrl: './aranzman.component.scss'
})
export class AranzmanComponent implements OnInit {
//  @ViewChild(MatPaginator) paginator: MatPaginator;
aranzmani: Aranzman[] = [];
//pagedAranzmani: Aranzman[] = []; // niz koji ce sadrzati trenutno prikazane stranice

buttonClick=true;

//paginacija: 
//currentPage = 1;
//itemsPerPage = 2; 
//lenght = 0;

//paginacija 2 
aranzmani2:Brosura[] = [];
curPage: number = 1;
totPages: number = 0;
pageNumbers: number[] = [];

getPaginatedAranzmani(): void {
  this.aranzmanService.getPaginatedAranzmani(this.curPage).subscribe((data)=>{

    data.data.forEach((aranzman: any) => {
      aranzman.start_date = new Date(aranzman.start_date);
      aranzman.end_date = new Date(aranzman.end_date);
      aranzman.avg_price = parseFloat(aranzman.avg_price);
      this.aranzmani2.push(aranzman as Brosura);
    });

    
    //this.aranzmani2 = data.data as Brosura[];
    this.curPage = data.current_page;
    this.totPages = data.last_page;
    this.pageNumbers = Array.from({length:this.totPages},(_,i)=>i+1);
    console.log("page numbers:",this.aranzmani2[1]);
  });
} 

onPageChange2(pageNumber:number):void {
  this.curPage = pageNumber;
  this.getPaginatedAranzmani();
}

constructor(private aranzmanService: AranzmanService,private router:Router, private shareService:ShareService){}

//u vreme incijializacije stranice
ngOnInit(){

  //this.fetchAranzmani();
  this.getPaginatedAranzmani();

}
/*
setPage(page: number) {
  console.log("Aranzmani length: u set page"+this.aranzmani.length);
  const startIndex = (page-1)*this.itemsPerPage;
  const endIndex = Math.min(startIndex + this.itemsPerPage - 1, this.aranzmani.length - 1);

  this.pagedAranzmani = this.aranzmani.slice(startIndex,endIndex+1);
  console.log("PAGED AR:"+this.pagedAranzmani.length)
}
*/

// metoda koja menja stranicu
/*
onPageChange(event: any) {
  this.currentPage = event; // pageIndex je baziran na nuli, pa dodajemo 1
  this.fetchAranzmani();
  // this.itemsPerPage = event.pageSize;
  //this.setPage(this.currentPage);
}
*/

/*
fetchAranzmani(): void {

  this.aranzmanService.getAranzmani().subscribe(
  (data:Aranzman[]) => {

    this.aranzmani = data;
    console.log(this.aranzmani);
    this.lenght = this.aranzmani.length;
    this.setPage(this.currentPage);
  },
  (error) => {
    console.log("Error fetching aranzmani:",error);
  }

  );

  console.log(this.aranzmani.length);


}
*/

onAddToCart(aranzman:Aranzman) {

  if(!localStorage.getItem('token')){
    this.router.navigate(['/login']); 
    return;
  }


  if(aranzman.br_mesta > 0){
    //console.log(aranzman);
    aranzman.br_mesta--;
    this.shareService.setAranzman(aranzman);
    this.router.navigate(['/profile']); 

  }

  for( const a of this.aranzmani){
    console.log(a);
  }
}

onRemoveFromCart(aranzman:Aranzman) {
  aranzman.br_mesta++;

  for( const a of this.aranzmani){
    console.log(a);
  }
}









}
