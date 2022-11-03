---
extends: _layouts.post
section: content
title: Longest palindrome by concatenating two letter words
problemUrl: https://leetcode.com/problems/longest-palindrome-by-concatenating-two-letter-words/
date: 2022-11-03
categories: [array-and-hashmap]
---

We can use a hashmap to store the frequency of each word. Then we can iterate over the words and check if the reverse of the word is present in the hashmap. If it is, we add the frequency of the word and the reverse of the word to the result.

```python
class Solution:
    def longestPalindrome(self, words: List[str]) -> int:
        counter = Counter(words)
        res = mid = 0
        for word in counter.keys():
            if word[0] == word[1]:
                res += counter[word] if counter[word] % 2 == 0 else counter[word]-1
                mid |= counter[word] % 2
            elif word[::-1] in counter:
                res += min(counter[word], counter[word[::-1]])
        return (res + mid) * 2
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`