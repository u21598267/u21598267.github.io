using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace ProductSupplier.Models
    {
    // Complete this View Model. Consider the data that it would receive and manage.
    // You would also need to use this VM to manage the newly created Product List.
    // This model would manage the Min and Max values.

    public class PriceRangeVM  // Complete this model......
        {
            public List<Product> Products { get; set; }
        public int Min { get; set; }
        public int Max { get; set; }
    }
    }