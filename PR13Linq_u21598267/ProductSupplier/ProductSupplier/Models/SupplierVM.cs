using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
namespace ProductSupplier.Models
    {

    // Complete this View Model. Consider the data that it would receive and manage.
    // You would also need to use this MODEL to manage the data that is shared 
    // between the zONLY the Supplier (SupplierID) and the Product (ProductID).

    public class SupplierVM  // Complete this model......
    {
        public List<ProdSupplier> ProdSuppliers { get; set; }

        public List<Supplier> Suppliers { get; set; }
    }
    }