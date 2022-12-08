DELIMTER //
create trigger tr_updStockCompra after insert on purchase_details
	for each row begin
		update products set stock = stock + new.quantity where products.id = NEW.product_id;
end;
//
DELIMTER ;

DELIMTER //
create trigger tr_updStockCompraAnular after insert on purchase
	for each row begin
		update products join shopping_details di on  set stock = stock + new.quantity where products.id = NEW.product_id;
end;
//
DELIMTER ;
