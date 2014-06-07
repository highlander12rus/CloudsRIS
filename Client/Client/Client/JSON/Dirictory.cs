using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Newtonsoft.Json;

namespace Client.Classes
{
    class Dirictory
    {
        public bool isLoad
        {
            get;
            set;
        }

        [JsonProperty("folders")]
        public List<string> Folders { get; set; }

        [JsonProperty("files")]
        public List<File> Files { get; set; }
    }

}
