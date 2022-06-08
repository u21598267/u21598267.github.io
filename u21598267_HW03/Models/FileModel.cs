
using System.ComponentModel.DataAnnotations; 
using System.Web;

namespace u21598267_HW03.Models
{
    public class FileModel
    {
      

        [Display(Name = "File Name")]
        public string FileName { get; set; }
       
        [Required(ErrorMessage = "Please select file.")]
        [Display(Name = "Browse File")]
        public HttpPostedFileBase[] Files { get; set; }
    }
}