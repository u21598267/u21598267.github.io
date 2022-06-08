using u21598267_HW03.Models;
using System.Collections.Generic; 
using System.IO; 
using System.Web.Mvc;
namespace u21598267_HW03.Controllers
{
    public class VideoController : Controller
    {
       
        public ActionResult Index()

        {

            string[] filePaths = Directory.GetFiles(Server.MapPath("~/Content/Media/videos"));

            List<FileModel> files = new List<FileModel>();

            foreach (string filePath in filePaths)
            {
                files.Add(new FileModel { FileName = Path.GetFileName(filePath) });
            }
            return View(files);
        }

        public FileResult DownloadFile(string fileName)
        {
     

            string path = Server.MapPath("~/Content/Media/videos/") + fileName;


            byte[] bytes = System.IO.File.ReadAllBytes(path);

            return File(bytes, "application/octet-stream", fileName);
        }

        public ActionResult DeleteFile(string fileName)
        {
       

            string path = Server.MapPath("~/Content/Media/videos/") + fileName;
            byte[] bytes = System.IO.File.ReadAllBytes(path);

            System.IO.File.Delete(path);

            return RedirectToAction("Index");
        }
    }
}