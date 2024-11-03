# Archive.org-Synology-DLM
## A search download manager for Synology DSM NAS's ##

Use  ```tar zcf archiveorg.dlm INFO search.php``` to compress file into one correctly named file.

The indentation are important in the INFO file, any deviation will cause the file to be rejected.

The DLM guide is taken from ```https://global.download.synology.com/download/Document/Software/DeveloperGuide/Package/DownloadStation/All/enu/DLM_Guide.pdf``` on 02/11/24 but it's included here just incase it is removed from source. It's unlikely it will be updated, but its worth looking for an updated version if needed.

<code style="color : red">REMEMBER TO SEED - Archive.org IS A NON-PROFIT, HELP THEM TO PROVIDE FOR EVERYONE</code>


-------------------------------------------------
### Change Log : ###

V1.0 : First working release

v1.1 : Limited results to 5000 by adding ```&rows=5000``` to the search string
