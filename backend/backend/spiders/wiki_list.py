import scrapy
import json

filename = "wiki.txt"  # To save store data

class IntroSpider(scrapy.Spider):
    name = "wiki_spider"     # Name of the scraper

    def start_requests(self):
        urls = [
            'http://en.wikipedia.org/wiki/mongodb'
        ]

        for url in urls:
            yield scrapy.Request(url=url, callback=self.parse)

    def parse(self, response):
        list_data=[]

        title = response.css('h1.firstHeading > span.mw-page-title-main::text').extract()  # accessing the titles
        image = response.css('#mw-content-text > div.mw-content-ltr.mw-parser-output > table.infobox.vevent > tbody > tr:nth-child(1) > td > span > a > img::attr(src)').extract()  # accessing the titles
        desc = response.css('#mw-content-text > div.mw-content-ltr.mw-parser-output > p::text').extract()

        i=0
        for item in desc:
            data={
                'title' : title,
                'image' : image,
                'desc' : desc[i],
            }
            i+=1
            list_data.append(data)

        with open(filename, 'a+') as f:   # Writing data in the file
            for data in list_data :
                app_json = json.dumps(data)
                f.write(app_json+"\n")
