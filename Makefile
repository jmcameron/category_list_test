ZIPFILE = category_list_test.zip

FILES = *.php *.xml

all: $(ZIPFILE)

ZIPIGNORES = -x "*.zip" -x "*~" -x "*.git/*" -x "*.gitignore"

$(ZIPFILE): $(FILES)
	@echo "-------------------------------------------------------"
	@echo "Creating plugin zip file: $(ZIPFILE)"
	@echo ""
	@zip -r ../$@ * $(ZIPIGNORES)
	@mv ../$@ .
	@echo "-------------------------------------------------------"
	@echo "done"
