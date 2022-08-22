---
extends: _layouts.post
section: content
title: Check if a word occurs as a prefix of any word in a sentence
problemUrl: https://leetcode.com/problems/check-if-a-word-occurs-as-a-prefix-of-any-word-in-a-sentence/
date: 2022-08-22
categories: [array-and-hashmap]
---

We will split the string with space then iterate over each word to check the prefix, if we find one, we return the position of the word in the sentence, else we return -1.

```python
class Solution:
    def isPrefixOfWord(self, sentence: str, searchWord: str) -> int:
        sentence = sentence.split(" ")
        for i, word in enumerate(sentence):
            if word.startswith(searchWord):
                return i+1
        return -1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`