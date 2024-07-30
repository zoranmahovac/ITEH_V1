import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BrosuraComponent } from './brosura.component';

describe('BrosuraComponent', () => {
  let component: BrosuraComponent;
  let fixture: ComponentFixture<BrosuraComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [BrosuraComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(BrosuraComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
