---
extends: _layouts.post
section: content
title: Unique word abbreviation
problemUrl: https://leetcode.com/problems/unique-word-abbreviation/
date: 2022-11-30
categories: [array-and-hashmap, design]
---

We will use a dictionary to store the count of each abbreviation, and a set to store the words that have been added to the dictionary. If the word is already present in the set, we will return false. If the abbreviation is already present in the dictionary, we will return false if the count is greater than 1. Otherwise, we will add the word to the set and the abbreviation to the dictionary.

```python
class ValidWordAbbr:
    def __init__(self, dictionary: List[str]):
        self.dictionary = collections.defaultdict(set)
        for word in dictionary:
            abbr = self._abbr(word)
            self.dictionary[abbr].add(word)

    def isUnique(self, word: str) -> bool:
        abbr = self._abbr(word)
        return abbr not in self.dictionary or self.dictionary[abbr] == set([word])
        
    def _abbr(self, word: str) -> str:
        return word[0]+str(len(word)-2)+word[-1]

# Your ValidWordAbbr object will be instantiated and called as such:
# obj = ValidWordAbbr(dictionary)
# param_1 = obj.isUnique(word)
```

Time complexity: `O(n)`, n is the length of the dictionary <br/>
Space complexity: `O(n)`