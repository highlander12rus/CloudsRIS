using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Newtonsoft.Json;


namespace Client.Classes
{
    class File
    {
        [JsonProperty("id")]
        public string Id { get; set; }

        [JsonProperty("name")]
        public string Name { get; set; }

        [JsonProperty("length")]
        public long Length { get; set; }


        public override string ToString()
        {
            return Name;
        }
    }
}
