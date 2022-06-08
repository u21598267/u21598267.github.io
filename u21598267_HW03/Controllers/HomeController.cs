using System.IO;
using System.Web;
using System.Web.Mvc;

namespace u21598267_HW03.Controllers
{
    public class HomeController : Controller
    {
        [HttpGet]
        public ActionResult Index()  
        {
            return View();
        }

      
        [HttpPost]
        public ActionResult Index(HttpPostedFileBase files) 
        {
          

            if (files != null && files.ContentLength > 0)
            {
             

                var fileName = Path.GetFileName(files.FileName);

              

                var path = Path.Combine(Server.MapPath("~/App_Data/uploads"), fileName);
              

                files.SaveAs(path);

            }

            return RedirectToAction("Index");
        }
public ActionResult About()
        {
          

            return View();
        }

       
    }
}