---
extends: _layouts.post
section: content
title: Sentence similarity
problemUrl: https://leetcode.com/problems/sentence-similarity/
date: 2023-02-01
categories: [array-and-hashmap, graph]
---

The bruteforce way is to everytime when you see a word in sentence2, you loop through the entire similarPairs, see if the word exisits in one of the paris together with the corresponding word in sentence1. This is linear time for the check and to check all words in sentence1, this becomes O(size of similarPairs * length of sentence1)

There is usually a trade off between time complexity and space complexity, so how can we increase space complexity to get rid of time complexity? We can pre-calculate a data structure to store all similar pairs before we loop through words.

For fast lookup of a single certain value, Hashing almost always works. You can create a HashTable where key is a word in the similarity pair, and the value is a hashset that contains all the similar pairs for that word in the similar paris array. You do so with the adj hashtable. Which short for "adjacency list" and is commonly used in graph problems.

```python
class Solution:
    def areSentencesSimilar(self, sentence1: List[str], sentence2: List[str], similarPairs: List[List[str]]) -> bool:
        adj = collections.defaultdict(set)
        for a, b in similarPairs: 
            adj[a].add(b)
            adj[b].add(a)
        
        if len(sentence1) != len(sentence2): 
            return False 
        for i in range(len(sentence1)): 
            if sentence1[i] != sentence2[i] and sentence2[i] not in adj[sentence1[i]]: 
                return False 
        return True 
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`

